<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>3D Model</title>
    <meta name="description" content="3D Model">
    <script src="https://aframe.io/releases/1.2.0/aframe.min.js"></script>
    <script src="{{asset('js/aframe-master.js')}}"></script>
    <script src="{{asset('js/play-all-model-animations.js')}}"></script>
    <script type="module" src="https://unpkg.com/@google/model-viewer/dist/model-viewer.min.js"></script>

    <style>
        model-viewer#reveal {
            --poster-color: transparent;
             width: 800px;
             height: 600px;
            margin:auto;
        }
    </style>
</head>
<body>
<model-viewer id="reveal" camera-controls auto-rotate src="/images/{{$experiencia->archivo->ruta_archivo}}" alt="A 3D model"></model-viewer>

</body>
</html>
