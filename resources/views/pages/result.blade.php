@extends('layouts.main')
@section('title')
Ergebnis
@stop
@section('content')
    <div class="container result">
        <h1>Dein Ergebnis:</h1>
        <div class="col-12">
        <canvas id="resultWeb" width="800" height="800"></canvas>
        </div>
    </div>
<script type="text/javascript"></script>
        <script type="text/javascript">
            this.draw({{ $mild }}, {{ $suess }}, {{ $wuerzig }}, {{ $fruchtig }})
            function draw(mild, suess, wuerzig, fruchtig){
            var canvas = document.getElementById('resultWeb');
            if(canvas.getContext){
              var ctx = canvas.getContext('2d');
                

            ctx.globalAlpha = 1;
              var grd=ctx.createLinearGradient(0,0,800,0);
              grd.addColorStop(0,"#eea849");
              grd.addColorStop(1,"#f46b45");

              ctx.beginPath();
              ctx.moveTo((100-mild)*4, (100-mild)*4);
              ctx.lineTo(800-(100-suess)*4, (100-suess)*4);
              ctx.lineTo(800-(100-wuerzig)*4, 800-(100-wuerzig)*4);
              ctx.lineTo((100-fruchtig)*4, 800-(100-fruchtig)*4);
              ctx.fillStyle = grd;
              ctx.fill();
                
                ctx.lineWidth = 5;
              ctx.strokeStyle = "666"; 
              ctx.globalAlpha = 0.2;

              ctx.beginPath();
              ctx.moveTo(0,100*4);
              ctx.lineTo(200*4,100*4);
              ctx.stroke();

              ctx.beginPath();
              ctx.moveTo(100*4,0);
              ctx.lineTo(100*4,200*4);
              ctx.stroke();
                
                ctx.font = "40px Montserrat";
                ctx.fillStyle = "black";
                ctx.fillText("mild",160,200);
                ctx.fillText("süß",570,200);
                ctx.fillText("würzig",130,600);
                ctx.fillText("fruchtig",540,600);
            }
            }
        </script>
@stop