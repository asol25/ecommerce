const config = {
    apiKey: "AIzaSyDSEge0CQkRNhEhx-tcIdgIyLdgCW8BgAM",
    authDomain: "images-services-52149.firebaseapp.com",
    databaseURL: "https://images-services-52149.firebaseio.com",
    projectId: "images-services-52149",
    storageBucket: "gs://images-services-52149.appspot.com",
    messagingSenderId: "388061356865"
};
firebase.initializeApp(config);

function GetPictureInfoViews() {
    let selectedFile;
    let picture = document.getElementById("photo");

    // selected file is that file which user chosen by html form
    selectedFile = picture.files[0];
    document.getElementById("submit_link").disabled = true;
    ConfigCloudStorage(selectedFile); // call below written function
}

async function ConfigCloudStorage(selectedFile) {
    const currentTimestamp = '123';
    let uniqueName = currentTimestamp + Date.now();
    const storagePathFolder = '/images/';
    let storageRef = firebase.storage().ref(storagePathFolder + uniqueName);
    const uploadTaskSnapshot = storageRef.put(selectedFile).then(() => {
        return firebase.storage().ref(`${storagePathFolder}/${uniqueName}`).getDownloadURL();
    });
    let imageInfoUrl = uploadTaskSnapshot.then((result) => { return imageInfoUrl = result });

    if (await imageInfoUrl) {
        document.getElementById("submit_link").disabled = false;
        document.getElementById("input_link").value = imageInfoUrl;
    }

}

function TransferToServer(path) {
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "http://localhost:3000/backend/imagesServices/imagesService.php", true);
    xhr.onload = () => {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                let data = xhr.response;
                if (data === "success") {
                }
            }
        }
    };
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.send(path);
}