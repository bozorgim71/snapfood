<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCommentValidationRequest;
use App\Models\Comment;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('comments.comments',[
            'comments'=>Comment:: all()
        ]);
    }
    public function adminComments()
    {
        return view('comments.adminComments',[
            'comments'=>Comment:: all()
        ]);
    }
//adminComments
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      //  return Order::find($request->order_id)['restaurant_id'];
       // $request->validated();

        $request->validate([
            'score' => ['required', 'integer', 'min:0','max:5'],
            'message' => ['required', 'string', 'max:255'],
            'order_id'=> ['required']
        ]);



        $id = auth('sanctum')->user()->id;
        $comment = Comment::create([
            'message' => $request->message,
            'score' => $request->score,
            'order_id'=>$request->order_id,
            'user_id'=>$id,
            'restaurant_id'=>Order::find($request->order_id)['restaurant_id']
        ]);

        return response([
            "msg"=> "comment created successfully"
        ],201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       $comments= Comment::where('restaurant_id','=',$id)->get();
       $msg=[];
       foreach ($comments as $comment){
           $msg[]=[
               'author'=>User::find($comment['user_id'])['name'],
               'food'=>Order::find($comment['order_id'])['foods_name'],
               'score'=>$comment['score'],
               'message'=>$comment['message'],
               'answer'=>$comment['answer']
           ];
       }

       return response([
           'comments'=>$msg
       ],201);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      //  return $request->answer;
        $comment = Comment::find($id);
        $comment->update($request->all());

        return redirect('comments');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Comment::destroy($id);
        return redirect('adminComments');
    }

    public function comments($id)
    {
//        return "ok";
//        $order=Order::find($id);
//
//        return $order->comments();
    }
}
