<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>My tweets</title>
    <link rel="stylesheet" href="https://bootswatch.com/4/cerulean/bootstrap.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  </head>
  <body>
      <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container">
          <div class="navbar-header">
              <a href="/" class="navbar-brand">MyTweetz</a>
          </div>
        </div>
      </nav>
<br>
      <div class="container">

          <form class="well" action="{{route('post.tweet')}}" method="post" enctype="multipart/form-data">
            {{csrf_field()}}
                @if(count($errors) > 0)
                    @foreach($errors->all() as $error)
                      <div class="alert alert-danger">
                          {{$error}}
                      </div>
                      @endforeach
                @endif

                <div class="form-group">
                  <label>Tweet text</label>
                  <input type="text" name="tweet" class="form-control">
                </div>

                <div class="form-group">
                  <label>Upload images</label>
                  <input type="file" name="images[]" multiple class="form-control">
                </div>

                <div class="form-group">
                  <button class="btn btn-success">Create tweet</button>
                </div>
          </form>
        @if(!empty($data))
          @foreach($data as $tweet)
<div class="well">
  <h3>{{$tweet['text']}}
      <i class="glyphicon glyphicon-heart"></i>{{$tweet['favorite_count']}}
      <i class="glyphicon glyphicon-repeat"></i>{{$tweet['retweet_count']}}
</h3>

      @if(!empty($tweet['extended_entities']['media']))
        @foreach($tweet['extended_entities']['media'] as $i)
        <img src="{{$i['media_url_https']}}" style="width:100px;">
        @endforeach
      @endif
</div>
          @endforeach
        @else
          <p>No tweets found ...</p>
        @endif

      </div>
  </body>
</html>
