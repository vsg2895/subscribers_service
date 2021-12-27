<?php

namespace App\Http\Controllers;

use App\Http\Requests\ArticlesRequest;
use App\Jobs\SendArticleEmail;
use App\Mail\NewArticleMail;
use App\Models\Articles;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Events\CreateArticleEvent;

class ArticlesController extends Controller
{
    public function create(ArticlesRequest $request)
    {
//        Use create but needed use created article data
        $result = Articles::create($request->all());
        $site = $result->article_site;
        $subscribers = $site->subscribers;
        foreach ($subscribers as $elem) {
            $data = [
                "id" => $request->id,
                "name" => $result->name,
                "description" => $result->description,
                "email" => $elem->email,
                "sitename" => $site->name,
            ];
            event(new CreateArticleEvent($data));
        }
        return response()->json('Article create successfully');
    }
}
