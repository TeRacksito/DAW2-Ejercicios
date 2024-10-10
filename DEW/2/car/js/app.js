const scene = new THREE.Scene();
const camera = new THREE.PerspectiveCamera(75, window.innerWidth / window.innerHeight, 0.1, 1000);
const renderer = new THREE.WebGLRenderer({ antialias: true });
renderer.setSize(window.innerWidth, window.innerHeight);
document.body.appendChild(renderer.domElement);

renderer.shadowMap.enabled = true;
renderer.shadowMap.type = THREE.PCFSoftShadowMap;

camera.rotation.x = radians(-90);
camera.rotation.y = 0;
camera.rotation.z = 0;
camera.position.y = 20;
camera.position.x = 0;
camera.position.z = 22;

const ambientLight = new THREE.AmbientLight(0xc0c0f0, 0.6);
ambientLight.intensity = 0.1;

const directionalLight = new THREE.DirectionalLight(0xf1f1ff, 0.8);
directionalLight.position.set(5, 5, 5);
directionalLight.intensity = 1;
directionalLight.castShadow = true;


directionalLight.shadow.mapSize.width = 1024;
directionalLight.shadow.mapSize.height = 1024;

const shadowCam = directionalLight.shadow.camera;
shadowCam.left = -30;
shadowCam.right = 30;
shadowCam.top = 30;
shadowCam.bottom = -30;
shadowCam.near = 0;
shadowCam.far = 50;

scene.add(directionalLight);

const groundGeometry = new THREE.PlaneGeometry(2000, 2000);
const groundMaterial = new THREE.MeshStandardMaterial({ color: 0xa0a0a0 });
const ground = new THREE.Mesh(groundGeometry, groundMaterial);
ground.rotation.x = -Math.PI / 2;
ground.position.y = 0;
ground.receiveShadow = true;
scene.add(ground);

let loader = new THREE.GLTFLoader();
let car;
const boneReferences = {};

loader.load('/ejercicios/DEW/2/car/model/police_car.glb', (gltf) => {
    car = gltf.scene;
    car.traverse((object) => {
        if (object.isBone) {
            boneReferences[object.name] = object;
            console.log('Bone:', object.name);
        }

        if (object.isMesh) {
            object.castShadow = true;
            object.receiveShadow = true;
            object.material.side = THREE.DoubleSide;
        }
    });

    car.position.y = -0.04;
    car.position.x = 0;
    car.position.z = -20;
    scene.add(car);
});

const pmremGenerator = new THREE.PMREMGenerator(renderer);
pmremGenerator.compileEquirectangularShader();

new THREE.RGBELoader()
    .setDataType(THREE.UnsignedByteType)
    .load('/ejercicios/DEW/2/car/model/table_mountain_2_puresky_4k.hdr', function (texture) {
        const envMap = pmremGenerator.fromEquirectangular(texture).texture;
        pmremGenerator.dispose();

        scene.environment = envMap;
        scene.background = envMap;

        car.traverse((object) => {
            if (object.isMesh) {
                object.material.envMap = envMap;
                object.material.envMapIntensity = 2;
                object.material.needsUpdate = true;
                object.castShadow = true;
                object.receiveShadow = true;
            }
        });
    });


loader = new THREE.FontLoader();

function genTextGeometry(font, text) {
    const textGeometry = new THREE.TextGeometry(text, {
        font: font,
        size: 3,
        height: 1,
        curveSegments: 12,
        bevelEnabled: true,
        bevelThickness: 0.03,
        bevelSize: 0.02,
        bevelSegments: 5
    });

    textGeometry.center();

    return textGeometry;
}

loader.load('font/helvetiker_regular.typeface.json', function (font) {

    const textMaterial = new THREE.MeshStandardMaterial({ color: 0x808080 });
    let textMesh1 = new THREE.Mesh(genTextGeometry(font, 'BELIEVING'), textMaterial);
    let textMesh2 = new THREE.Mesh(genTextGeometry(font, 'IS DOING'), textMaterial);

    textMesh1.rotation.x = -Math.PI / 2;
    textMesh1.position.set(-3, 0, 3);
    textMesh2.rotation.x = -Math.PI / 2;
    textMesh2.position.set(3, 0, -3);

    scene.add(textMesh1);
    scene.add(textMesh2);
});

window.addEventListener('resize', () => {
    const width = window.innerWidth;
    const height = window.innerHeight;
    renderer.setSize(width, height);
    camera.aspect = width / height;
    camera.updateProjectionMatrix();
});

const targetPosition = { x: 2.6, y: 0.3, z: -21.2 };
const duration = 20000;

const startQuaternion = camera.quaternion.clone();

const targetQuaternion = new THREE.Quaternion();
function radians(degrees) {
    return degrees * (Math.PI / 180);
}
targetQuaternion.setFromEuler(new THREE.Euler(0, radians(120), radians(10), 'XYZ'));

const tweenQuaternion = { t: 0 };

const quaternionTween = new TWEEN.Tween(tweenQuaternion)
    .to({ t: 1 }, duration * 0.6)
    .easing(TWEEN.Easing.Quadratic.InOut)
    .onUpdate(() => {
        camera.quaternion.slerpQuaternions(startQuaternion, targetQuaternion, tweenQuaternion.t);
    })
    .onComplete(() => {
        console.log('Quaternion tween complete');
    });

const cameraTween = new TWEEN.Tween(camera.position)
    .to(targetPosition, duration)
    .easing(TWEEN.Easing.Quadratic.InOut)
    .onComplete(() => {
        console.log('Camera movement complete');
    });

function startTweens() {
    cameraTween.start();

    setTimeout(() => {
        quaternionTween.start();
    }, duration / 2);

    setTimeout(() => {
        const container = document.querySelector(".container");
        container.setAttribute("show", "true");
        container.removeAttribute("hidden");
    }, duration);
}


function animate() {
    requestAnimationFrame(animate);

    if (car) {
        TWEEN.update();
    }
    renderer.render(scene, camera);
}

startTweens();
animate();

