<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
 <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
<style>
* {
  box-sizing: border-box;
}

/* Add a gray background color with some padding */
body {
  font-family: Arial;
  padding: 20px;
  background: #f1f1f1;
}

/* Header/Blog Title */
.header {
  padding: 30px;
  font-size: 40px;
  text-align: center;
  background: white;
}

/* Create two unequal columns that floats next to each other */
/* Left column */
.leftcolumn {   
  float: left;
  width: 75%;
}

/* Right column */
.rightcolumn {
  float: left;
  width: 25%;
  padding-left: 20px;
}

/* Fake image */
.fakeimg {
  background-color: #aaa;
  width: 100%;
  padding: 20px;
}

/* Add a card effect for articles */
.card {
   background-color: white;
   padding: 20px;
   margin-top: 20px;
}

/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}

/* Footer */
.footer {
  padding: 20px;
  text-align: center;
  background: #ddd;
  margin-top: 20px;
}

.img_s{

  width: ;
  height: ;
}
/* Responsive layout - when the screen is less than 800px wide, make the two columns stack on top of each other instead of next to each other */
@media screen and (max-width: 800px) {
  .leftcolumn, .rightcolumn {   
    width: 100%;
    padding: 0;
  }
}
</style>
</head>
<body>

<div class="header">
  <h2>Blog Name</h2>
</div>

<div class="container">
    <div class="col-sm-8">
        <form action="{{route('search')}}" method="GET">
          @csrf
            <div class="input-group">
                <input type="text" class="form-control" name="searchTerm" placeholder="Search for..." value="">
                <span class="input-group-btn">
                    <button class="btn btn-secondary" type="submit">Search</button>
                </span>
            </div>
        </form>
    </div>
</div>
<!-- {{ isset($searchTerm) ? $searchTerm : '' }} -->
<div class="row">

  <div class="leftcolumn">
     @foreach($blog as $blogs)
    <div class="card">
      <h2>{{$blogs->title}}</h2>
      <h5>Category {{$blogs->category}}</h5>
      <div class="fakeimg" style="height:200px;">
 <img src="{{ asset('uploads/'.$blogs->img)}}" alt="Hobby Thumb" height ="180px" width="100%">
                  
      </div>
      <p>Description..</p>
      <p> {{$blogs->description}} </p>
    </div>
   
   @endforeach
  </div>
  <div class="rightcolumn">
    <div class="card">
      <h2>About Me</h2>
      <div class="fakeimg" style="height:100px;">Image</div>
      <p>Some text about me in culpa qui officia deserunt mollit anim..</p>
    </div>
    <div class="card">
      <h3>Popular Post</h3>
      <div class="fakeimg">Image</div><br>
      <div class="fakeimg">Image</div><br>
      <div class="fakeimg">Image</div>
    </div>
    <div class="card">
      <h3>Follow Me</h3>
      <p>Some text..</p>
    </div>
  </div>

  
</div>
<div class ="mt-3">
  {{$blog->links()}}
</div>
<div class="footer">
  <h2>Footer</h2>
</div>

</body>
</html>
