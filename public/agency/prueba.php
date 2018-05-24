<!DOCTYPE html>
<html lang="en">
	<head>
		<title>three.js webgl - convex geometry</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0">
		<style>
			body {
				font-family: Monospace;
				background-color: #000;
				margin: 0px;
				overflow: hidden;
			}
			#info {
				position: absolute;
				color: #fff;
				top: 0px;
				width: 100%;
				padding: 5px;
				text-align:center;
			}
			a {
				color: #fff;
			}
		</style>
	</head>
	<body>

		<div id="info"><a href="http://threejs.org" target="_blank">three.js</a> - ConvexGeometry</div>

		<script src="js/build/three.js"></script>
		<script src="js/OrbitControls.js"></script>
		<script src="js/ConvexGeometry.js"></script>
		<script src="js/Detector.js"></script>
		<script src="js/libs/stats.min.js"></script>

		<script>
			if ( ! Detector.webgl ) Detector.addGetWebGLMessage();
			var group, camera, scene, renderer;
			init();
			animate();
			function init() {
				scene = new THREE.Scene();
				renderer = new THREE.WebGLRenderer( { antialias: true } );
				renderer.setPixelRatio( window.devicePixelRatio );
				renderer.setSize( window.innerWidth, window.innerHeight );
				document.body.appendChild( renderer.domElement );
				// camera
				camera = new THREE.PerspectiveCamera( 40, window.innerWidth / window.innerHeight, 1, 1000 );
				camera.position.set( 15, 20, 30 );
				scene.add( camera );
				// controls
				controls = new THREE.OrbitControls( camera, renderer.domElement );
				controls.minDistance = 20;
				controls.maxDistance = 50;
				controls.maxPolarAngle = Math.PI / 2;
				scene.add( new THREE.AmbientLight( 0x222222 ) );
				var light = new THREE.PointLight( 0xffffff, 1 );
				camera.add( light );
				scene.add( new THREE.AxisHelper( 20 ) );
				//
				var loader = new THREE.TextureLoader();
				var texture = loader.load( 'textures/sprites/disc.png' );
				group = new THREE.Group();
				scene.add( group );
				// points
				var pointsGeometry = new THREE.DodecahedronGeometry( 10 );
				for ( var i = 0; i < pointsGeometry.vertices.length; i ++ ) {
					//pointsGeometry.vertices[ i ].add( randomPoint().multiplyScalar( 2 ) ); // wiggle the points
				}
				var pointsMaterial = new THREE.PointsMaterial( {
					color: 0x0080ff,
					map: texture,
					size: 1,
					alphaTest: 0.5
				} );
				var points = new THREE.Points( pointsGeometry, pointsMaterial );
				group.add( points );
				// convex hull
				var meshMaterial = new THREE.MeshLambertMaterial( {
					color: 0xffffff,
					opacity: 0.5,
					transparent: true
				} );
				var meshGeometry = new THREE.ConvexGeometry( pointsGeometry.vertices );
				mesh = new THREE.Mesh( meshGeometry, meshMaterial );
				mesh.material.side = THREE.BackSide; // back faces
				mesh.renderOrder = 0;
				group.add( mesh );
				mesh = new THREE.Mesh( meshGeometry, meshMaterial.clone() );
				mesh.material.side = THREE.FrontSide; // front faces
				mesh.renderOrder = 1;
				group.add( mesh );
				//
				window.addEventListener( 'resize', onWindowResize, false );
			}
			function randomPoint() {
				return new THREE.Vector3( THREE.Math.randFloat( - 1, 1 ), THREE.Math.randFloat( - 1, 1 ), THREE.Math.randFloat( - 1, 1 ) );
			}
			function onWindowResize() {
				camera.aspect = window.innerWidth / window.innerHeight;
				camera.updateProjectionMatrix();
				renderer.setSize( window.innerWidth, window.innerHeight );
			}
			function animate() {
				requestAnimationFrame( animate );
				group.rotation.y += 0.005;
				render();
			}
			function render() {
				renderer.render( scene, camera );
			}
		</script>

	</body>
</html>