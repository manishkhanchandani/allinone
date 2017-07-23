<?php
session_start();
include('../functions.php');

pr($_SESSION);
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
<script src="jquery-3.2.1.js"></script>
<script>
function postJson(url, params, callback, callbackFailed)
{
	var jqxhr = $.ajax({
		url:url,
  		type:'POST',
		data: JSON.stringify(params),
		contentType:"application/json; charset=utf-8"}
		)
	  .done(callback)
	  .fail(callbackFailed)
	  .always(function() {
		console.log( "finished" );
	  });
}

function post(url, params, callback, callbackFailed)
{
	var jqxhr = $.ajax({
		url:url,
  		type:'POST',
		data: params,
		})
	  .done(callback)
	  .fail(callbackFailed)
	  .always(function() {
		console.log( "finished" );
	  });
}
function get(url, callback, callbackFailed)
{
	var jqxhr = $.ajax({
		url:url,
  		type:'GET',
		})
	  .done(callback)
	  .fail(callbackFailed)
	  .always(function() {
		console.log( "finished" );
	  });
}

function cb(data, status, xhr) {
	console.log('data is ', data);
	console.log('status is ', status);
	console.log('xhr is ', xhr);
}

function dn() {
	console.log('done');
}

function cbFailed(jqxhr, settings, ex) {
	console.log('ex is ', ex);
	console.log('jqxhr is ', jqxhr);
	console.log('settings is ', settings);
}
</script>
<script src="https://www.gstatic.com/firebasejs/4.1.3/firebase.js"></script>
<script>
  // Initialize Firebase
  var config = {
    apiKey: "AIzaSyDnERUhALUFNxWZsjaLpT4_nqIYW2i2jDU",
    authDomain: "mkgxy-3d7ce.firebaseapp.com",
    databaseURL: "https://mkgxy-3d7ce.firebaseio.com",
    projectId: "mkgxy-3d7ce",
    storageBucket: "mkgxy-3d7ce.appspot.com",
    messagingSenderId: "938795223362"
  };
  firebase.initializeApp(config);
</script>
    
<script>

firebase.auth().onAuthStateChanged(function(user) {
  if (user) {
      console.log('auth user: ', user);
    // User is signed in.
    var userData = {};
      userData.displayName = user.providerData[0].displayName;
      userData.email = user.providerData[0].email;
      userData.photoURL = user.providerData[0].photoURL;
      userData.uid = user.providerData[0].uid;
      userData.providerId = user.providerData[0].providerId;
      console.log('userData: ', userData);
    // ...
  } else {
    // User is signed out.
    // ...
  }
});
    
function googleLogin() {
    var provider = new firebase.auth.GoogleAuthProvider();
    //provider.addScope('https://www.googleapis.com/auth/contacts.readonly');
    firebase.auth().signInWithPopup(provider).then(function(result) {
       console.log('result is ', result);
      // This gives you a Google Access Token. You can use it to access the Google API.
      var token = result.credential.accessToken;

	  console.log('refreshToken: ', result.user.refreshToken);
      // The signed-in user info.
      var user = result.user;
      console.log('user is ', user);
      
      var userData = {};
      userData.displayName = user.providerData[0].displayName;
      userData.email = user.providerData[0].email;
      userData.photoURL = user.providerData[0].photoURL;
      userData.providerId = user.providerData[0].providerId;
      userData.providerUid = user.providerData[0].uid;
	  userData.uid = user.uid;
      console.log('userData: ', userData);
	  postJson('api.php', {userData: userData, refreshToken: result.user.refreshToken}, cb, dn, cbFailed);
      // ...
    }).catch(function(error) {
        console.log('error is ', error);
      // Handle Errors here.
      var errorCode = error.code;
      var errorMessage = error.message;
      // The email of the user's account used.
      var email = error.email;
      // The firebase.auth.AuthCredential type that was used.
      var credential = error.credential;
      // ...
    });
}
    

function facebookLogin() {
    var provider = new firebase.auth.FacebookAuthProvider();
    provider.addScope('user_birthday');
    firebase.auth().signInWithPopup(provider).then(function(result) {
	 console.log('result is ', result);
      // This gives you a Facebook Access Token. You can use it to access the Facebook API.
      var token = result.credential.accessToken;
      console.log('token is ', token);
      // The signed-in user info.
      var user = result.user;
      console.log(user);
      
      var userData = {};
      userData.displayName = user.providerData[0].displayName;
      userData.email = user.providerData[0].email;
      userData.photoURL = user.providerData[0].photoURL;
      userData.providerId = user.providerData[0].providerId;
      userData.providerUid = user.providerData[0].uid;
	  userData.uid = user.uid;
      console.log('userData: ', userData);
	  postJson('api.php', {userData: userData, refreshToken: result.user.refreshToken}, cb, dn, cbFailed);
      // ...
    }).catch(function(error) {
      console.log('error: ', error);
      // Handle Errors here.
      var errorCode = error.code;
      var errorMessage = error.message;
      // The email of the user's account used.
      var email = error.email;
      // The firebase.auth.AuthCredential type that was used.
      var credential = error.credential;
      // ...
    });
}
    

function twitterLogin() {
    var provider = new firebase.auth.TwitterAuthProvider();
    firebase.auth().signInWithPopup(provider).then(function(result) {
	 console.log('result is ', result);

      var user = result.user;
      
      console.log(user);
      
      var userData = {};
      userData.displayName = user.providerData[0].displayName;
      userData.email = user.providerData[0].email;
      userData.photoURL = user.providerData[0].photoURL;
      userData.providerId = user.providerData[0].providerId;
      userData.providerUid = user.providerData[0].uid;
	  userData.uid = user.uid;
      console.log('userData: ', userData);
	  postJson('api.php', {userData: userData, refreshToken: result.user.refreshToken}, cb, dn, cbFailed);
      // ...
    }).catch(function(error) {
      // Handle Errors here.
      var errorCode = error.code;
      var errorMessage = error.message;
      // The email of the user's account used.
      var email = error.email;
      // The firebase.auth.AuthCredential type that was used.
      var credential = error.credential;
      // ...
    });
} 

function gitHubLogin() {
    console.log('github');
    var provider = new firebase.auth.GithubAuthProvider();
    firebase.auth().signInWithPopup(provider).then(function(result) {
	 console.log('result is ', result);
      // This gives you a GitHub Access Token. You can use it to access the GitHub API.
      var token = result.credential.accessToken;
      console.log('token is ', token);
      // The signed-in user info.
      var user = result.user;
      
      console.log(user);
      
      var userData = {};
      userData.displayName = user.providerData[0].displayName;
      userData.email = user.providerData[0].email;
      userData.photoURL = user.providerData[0].photoURL;
      userData.providerId = user.providerData[0].providerId;
      userData.providerUid = user.providerData[0].uid;
	  userData.uid = user.uid;
      console.log('userData: ', userData);
	  postJson('api.php', {userData: userData, refreshToken: result.user.refreshToken}, cb, dn, cbFailed);
      // ...
    }).catch(function(error) {
      console.log('error: ', error);
      // Handle Errors here.
      var errorCode = error.code;
      var errorMessage = error.message;
      // The email of the user's account used.
      var email = error.email;
      // The firebase.auth.AuthCredential type that was used.
      var credential = error.credential;
      // ...
    });
}
    
function signOut() {
    firebase.auth().signOut().then(function() {
      // Sign-out successful.
        console.log('success logout');
    }).catch(function(error) {
      // An error happened.
        console.log('error logout: ', error);
    });
}
</script>
</head>

<body>
 <div><button id="googleLogin" onClick="googleLogin();" >Google Login</button></div>
  <div><button id="facebookLogin" onClick="facebookLogin();" >Facebook Login</button></div>
  <div><button id="twitterLogin" onClick="twitterLogin();" >Twitter Login</button></div>
  <div><button id="gitHubLogin" onClick="gitHubLogin();" >GitHub Login</button></div>
  <div><button id="logout" onClick="signOut();" >Logout</button></div>
</body>
</html>