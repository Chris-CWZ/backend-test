<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostsController extends Controller
{
    const POSTS_API_URL = "https://jsonplaceholder.typicode.com/posts";
    const COMMENTS_API_URL = "https://jsonplaceholder.typicode.com/comments";
    /**
     * Fetch top posts ordered by number of comments.
     *
     * @return \Illuminate\Http\Response
     */
    public function topPosts()
    {
        $postsCurl = curl_init(self::POSTS_API_URL);
        curl_setopt($postsCurl, CURLOPT_RETURNTRANSFER, true);
        $posts = json_decode(curl_exec($postsCurl));
        $returnedPosts = [];

        foreach($posts as $post){
            $commentsCurl = curl_init(self::COMMENTS_API_URL . "?postId=$post->id");
            curl_setopt($commentsCurl, CURLOPT_RETURNTRANSFER, true);
            $comments = json_decode(curl_exec($commentsCurl));
            $postObj = (object)[
                'post_id' => $post->id,
                'post_title' => $post->title,
                'post_body' => $post->body,
                'total_number_of_comments' => count($comments)
            ];
            $returnedPosts [] = $postObj;
        }
        usort($returnedPosts, function($a, $b){
            return $a->total_number_of_comments < $b->total_number_of_comments;
        });

        return $returnedPosts;
    }

    public function searchComments(Request $request){
        /** searchable fields
         * postId
         * id
         * name
         * email
         * */
        $fields = $request->all();
        $commentsCurl = curl_init(self::COMMENTS_API_URL . "?" . http_build_query($fields));
        $comments = json_decode(curl_exec($commentsCurl));

        return $comments;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
