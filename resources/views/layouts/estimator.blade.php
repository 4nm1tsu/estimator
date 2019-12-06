<html>
    <head>
        <title>@yield('title')</title>
        <style>
body {font-size:16pt; color:#708090; margin: 5px;}
/*
h1{font-size:50pt; text-align:right; color:#f6f6f6;
    margin:-20px 0px -30px 0px; letter-spacing:-4pt;}
*/
h1.title{
 position: relative;
  padding: 0.2em 0.5em;
  background: -webkit-linear-gradient(to right, rgb(255, 124, 111), #ffc994);
  background: linear-gradient(to right, rgb(255, 124, 111), #ffc994);
  color: white;
  font-weight: lighter;
  box-shadow: 0 0 4px rgba(0, 0, 0, 0.56);
}
#logout{font-size:20pt; text-align:right; color:#f6f6f6;
    margin:-20px 0px -30px 0px; letter-spacing:-4pt;}
ul{font-size:12pt;}
td{font-size:16pt;}
hr{margin:25px 100px; border-top: 1px dashed #ddd;}
.menutitle{font-size:14pt; font-weight:bold; margin: 0px;}
.content{margin:10px;}
.footer{text-align:right; font-size:10pt; margin:10px;
    border-bottom:solid 1px #ccc; color:#ccc;}
.blink {
  animation: blinkAnimeA 0.1s infinite alternate;
}
@keyframes blinkAnimeA{
   0% { background: #4dffff }
  95% { background: #ffff1a }
 100% { background: #ffff1a }
}
.highlighted{
color: #0000ff;
text-decoration: underline;
}
.blinkchr {
  animation: blinkAnimeB 0.6s infinite alternate;
}
@keyframes blinkAnimeB{
   0% { color: #ff0000 }
  97% { color: rgba(255, 255, 255, 0.99) }
 100% { color: rgba(255, 255, 255, 0.99) }
}
.fixed_btn
{
  font-size: 1.5em;
  width: 30%;
  height: 10%;
  position: fixed;
  top: 10px;
  right: 10px;
  padding: 6px 40px;

  display: inline-block;
  padding: 0.5em 1em;
  text-decoration: none;
  background: #668ad8;/*ボタン色*/
  color: #FFF;
  border-bottom: solid 4px #627295;
  border-radius: 3px;
}
.fixed_btn:active{
  /*ボタンを押したとき*/
  -webkit-transform: translateY(4px);
  transform: translateY(4px);/*下に動く*/
  border-bottom: none;/*線を消す*/
}
        </style>
    </head>
    <body>
        <h1 class='title'>@yield('title')</h1>
        <h2>@yield('loginfo')</h2>
<!--    @section('menubar')
        <h2 class="menutitle">メニュー</h2>
        <ul>
            <li>@show</li>
        </ul>
-->
        <hr size="1">
        <div class="content">
            @yield('content')
        </div>
        <div class="footer">
            @yield('footer')
        </div>
    </body>
</html>

