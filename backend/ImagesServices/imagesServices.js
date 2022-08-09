const firebaseConfig = {
    apiKey: "AIzaSyDSEge0CQkRNhEhx-tcIdgIyLdgCW8BgAM",
    authDomain: "images-services-52149.firebaseapp.com",
    databaseURL: "https://images-services-52149.firebaseio.com",
    projectId: "images-services-52149",
    storageBucket: "gs://images-services-52149.appspot.com",
    messagingSenderId: "388061356865"
};
const app = firebase.initializeApp(firebaseConfig);

function GetPictureInfoViews() {
    let configPicture;
    let picture = document.getElementById("photo");

    // selected file is that file which user chosen by html form
    configPicture = picture.files[0];

    // make save button disabled for few seconds that has id='submit_link'
    document.getElementById('submit_link').setAttribute('disabled', 'true');
    ConfigCloudStorage(configPicture); // call below written function
}
console.log(firebase.storage())

function ConfigCloudStorage(configPicture) {
    const currentTimestamp = '123';
    let uniqueName = currentTimestamp + Date.now();
    const storagePathFolder = '/images/';
    console.log(firebase.app)
    // let storageRef = firebase.storage().ref(storageUrl + uniqueName);
}