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

    selectedFile = picture.files[0];
    document.getElementById("submit_link").disabled = true;
    ConfigCloudStorage(selectedFile);
};

async function ConfigCloudStorage(selectedFile) {
    const currentTimestamp = '123';
    let uniqueName = currentTimestamp + Date.now();
    const storagePathFolder = '/images/';
    let storageRef = firebase.storage().ref(storagePathFolder + uniqueName);
    const uploadTaskSnapshot = storageRef.put(selectedFile).then(() => {
        return firebase.storage().ref(`${storagePathFolder}/${uniqueName}`).getDownloadURL();
    });
    let uploadTask = uploadTaskSnapshot.then((result) => { return uploadTask = result });

    if (await uploadTask) {
        console.log(uploadTask);
        document.getElementById("submit_link").disabled = false;
        document.getElementById("input_link").value = uploadTask;
    }
}
