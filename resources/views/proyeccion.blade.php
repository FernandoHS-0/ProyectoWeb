@extends('layouts.alumnoPlantilla')
@section('titulo', 'Proyeccion')
@section('cuerpo')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.3/jspdf.min.js"></script>
<script src="https://html2canvas.hertzen.com/dist/html2canvas.js"></script>
<script type="text/javascript" src="{{asset('\js\dragNdrop.js')}}"></script>
<link rel="stylesheet" href="{{asset('\css\dragNdropStyles.css')}}">
<style>
    #titPag{
        margin-left: 5%;
        display: inline-block;
    }
    #btnModal{
        display: inline-block;
        margin-left: 1%;
        margin-bottom: 1%;
        background-color: rgb(0, 181, 226);
    }
    #CB{
      background-color: #DEFDAF;
      cursor: move;
    }
    #MS{
      background-color: #FFAEF3;
      cursor: move;
    }
    #TEC{
      background-color: #CFBEEA;
      cursor: move;
    }
    #FGU{
      background-color: #FEFE9A;
      cursor: move;
    }
    .waves-effect.waves-buap .waves-ripple {
      background-color: rgb(0, 181, 226);
    }
    #contMat{
      background-color: rgb(0, 59, 92);
    }
    #btnG{
      width: 100%;
      margin: 0 50% 0 45%;
      display: block;
    }
</style>

<h3 id="titPag">Proyección de materias</h3>

<!-- Modal Structure -->
<div id="modal1" class="modal">
    <div class="modal-content">
      <h4>Acerca de la proyección</h4>
      <p>La proyección de materias se basa en las materias que estas cursando actualmente, dando por hecho que estas serán aprobadas, se revisa si se cumple con los pre requisitos de la siguiente materia para que se pueda mostrar como proyección y la puedas considerar a cursar en tu siguiente semestre</p>
      <p>Del lado izquierdo se muestran las materias que puede considerar para su proyección, estas debe arrastrarlas a la columna del lado derecho y al finalizar puede dar click en el botón de generar proyección para guardar su proyección</p>
    </div>
    <div class="modal-footer">
      <a href="#!" class="modal-close waves-effect waves-buap btn-flat">Aceptar</a>
    </div>
</div>
<a class="btn-floating btn waves-effect waves-light modal-trigger" href="#modal1" id="btnModal">
  <i class="material-icons">info</i>
</a>

  

<div class="container row" id="canvas_div_pdf">
  <div class="col s6" id="contMat">
    <h4 class="condensed light center-align white-text">Opciones</h4>
      @foreach ($colMat as $item => $value)
      @switch($value->area)
          @case('Ciencias basicas')
              <?php $color = "CB"?>
            @break
          @case('Modelado de sistemas')
              <?php $color = "MS"?>
            @break
            @case('Tecnologia')
              <?php $color = "TEC"?>
            @break
            @case('Formacion general universitaria')
              <?php $color = "FGU" ?>
            @break       
      @endswitch
        <div class="card draggable" id={{$color}} draggable="true">
        <div class="card-content">
            <p class="card-title center-align">{{$value->nombre}}</p>
            <p class="condensed light center-align">Id: {{$value->idmaterias}}</p>
            <p class="condensed light center-align">Nivel: {{$value->nivel}}</p>
            <p class="condensed light center-align">Creditos: {{$value->creditos}}</p>
            <p class="condensed light center-align">Área: {{$value->area}}</p>
        </div>
      </div>
    @endforeach
    
  </div>
  <div class="col s6" id="contMat">
    <h4 class="condensed light center-align white-text">Proyección</h4>
  </div>
  
</div>
<div id="btnG">
  <a class="waves-effect waves-light waves-buap btn-large" id="buap1" onclick="getPDF()">Guardar proyección</a>
</div>

<script>
	function getPDF(){

    var HTML_Width = $("#canvas_div_pdf").width();
    var HTML_Height = $("#canvas_div_pdf").height();
    var top_left_margin = 15;
    var PDF_Width = HTML_Width+(top_left_margin*2);
    var PDF_Height = (PDF_Width*1.5)+(top_left_margin*2);
    var canvas_image_width = HTML_Width;
    var canvas_image_height = HTML_Height;

    var totalPDFPages = Math.ceil(HTML_Height/PDF_Height)-1;


    html2canvas($("#canvas_div_pdf")[0],{allowTaint:true}).then(function(canvas) {
      canvas.getContext('2d');
      
      console.log(canvas.height+"  "+canvas.width);
      
      
      var imgData = canvas.toDataURL("image/jpeg", 1.0);
      var pdf = new jsPDF('p', 'pt',  [PDF_Width, PDF_Height]);
        pdf.addImage(imgData, 'JPG', top_left_margin, top_left_margin,canvas_image_width,canvas_image_height);
      
      
      for (var i = 1; i <= totalPDFPages; i++) { 
        pdf.addPage(PDF_Width, PDF_Height);
        pdf.addImage(imgData, 'JPG', top_left_margin, -(PDF_Height*i)+(top_left_margin*4),canvas_image_width,canvas_image_height);
      }
      
      pdf.save("Proyeccion.pdf");
    });
  };
</script>

@endsection