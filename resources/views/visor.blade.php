<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <title>Modelo Visor AR - VR</title>
    <meta name="description" content="Modelo Visor (VR / AR) ">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <script src="{{asset('js/aframe-master.js')}}"></script>
    <script src="{{asset('js/info-message.js')}}"></script>
    <script src="https://unpkg.com/aframe-extras@3.3.0/dist/aframe-extras.min.js"></script>
    <script src="{{asset('js/hide-on-enter-ar.js')}}"></script>
    <script src="{{asset('js/ar-shadow.js')}}"></script>
    <script src="{{asset('js/ar-hit-test.js')}}"></script>
    <script src="{{asset('js/model-viewer.js')}}"></script>
    <script src="{{asset('js/background-gradient.js')}}"></script>
</head>
<body>

<a-scene
    renderer="colorManagement: true;"
    info-message="htmlSrc: #messageText"
    model-viewer="gltfModel: #triceratops; title: Triceratops">
    <a-assets>
        <!--
          Model source: https://sketchfab.com/3d-models/triceratops-d16aabe33dc24f8ab37e3df50c068265
          Model author: https://sketchfab.com/VapTor
          Model license: Sketcfab Standard
        -->
        <a-asset-item id="triceratops"
                      src="https://cdn.aframe.io/examples/ar/models/triceratops/scene.gltf"
                      response-type="arraybuffer" crossorigin="anonymous"></a-asset-item>

        <a-asset-item id="reticle"
                      src="https://cdn.aframe.io/examples/ar/models/reticle/reticle.gltf"
                      response-type="arraybuffer" crossorigin="anonymous"></a-asset-item>

        <img id="shadow" src="shadow.png"></img>
        <a-asset-item id="messageText" src="message.html"></a-asset-item>
    </a-assets>
</a-scene>
</body>
</html>
