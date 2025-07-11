<?php
namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\CommentLike;
use App\Models\CommentReport;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    // 1. Yorum ekle
    public function store(Request $request, $complaintId)
    {
        $request->validate([
            'comment' => 'required|string|max:2000',
        ]);

        Comment::create([
            'comment' => $request->comment,
            'user_id' => auth()->id(),
            'complaint_id' => $complaintId,
            'status' => 'pending', // moderasyon için
        ]);

        return back()->with('success', 'Yorumunuz onay için gönderildi.');
    }

    // 2. Alt yorum (yanıt) ekle
    public function reply(Request $request, $commentId)
    {
        $parent = Comment::findOrFail($commentId);

        $request->validate([
            'comment' => 'required|string|max:2000',
        ]);

        Comment::create([
            'comment' => $request->comment,
            'user_id' => auth()->id(),
            'complaint_id' => $parent->complaint_id,
            'parent_id' => $parent->id,
            'status' => 'pending',
        ]);

        return back()->with('success', 'Yanıtınız onay için gönderildi.');
    }

    // 3. Yorum beğen
    public function like($commentId)
    {
        $comment = Comment::findOrFail($commentId);

        $exists = CommentLike::where('comment_id', $comment->id)
            ->where('user_id', auth()->id())
            ->exists();

        if (!$exists) {
            CommentLike::create([
                'comment_id' => $comment->id,
                'user_id' => auth()->id(),
            ]);
        }

        return back();
    }

    // 4. Yorum şikayet et
    public function report(Request $request, $commentId)
    {
        $request->validate([
            'reason' => 'required|string|max:255',
        ]);

        CommentReport::create([
            'comment_id' => $commentId,
            'user_id' => auth()->id(),
            'reason' => $request->reason,
        ]);

        return back()->with('success', 'Yorum şikayetiniz alındı.');
    }

    // 5. Moderasyon: yorumu onayla veya reddet (admin panelde kullanılır)
    public function moderate(Request $request, $commentId)
    {
        $request->validate([
            'status' => 'required|in:approved,rejected',
        ]);

        $comment = Comment::findOrFail($commentId);
        $comment->status = $request->status;
        $comment->save();

        return back()->with('success', 'Yorum durumu güncellendi.');
    }
}
