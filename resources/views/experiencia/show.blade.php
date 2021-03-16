<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Imagen 360</title>
    <meta name="description" content="Imagen 360">
    <script src="https://aframe.io/releases/1.2.0/aframe.min.js"></script>
    <script src="{{asset('js/aframe-master.js')}}"></script>


</head>
<body>
    <a-scene>
        <a-sky src="/images/{{$experiencia->archivo->ruta_archivo}}" rotation="0 0 0"></a-sky>

        <a-text font="kelsonsans" value="{{$experiencia->titulo}}" width="6" position="-2.5 0.25 -1.5"
                rotation="0 15 0"></a-text>
    </a-scene>

</body>
</html>
