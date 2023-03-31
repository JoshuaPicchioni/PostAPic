 // setting up firebase authentication for user registration


const firebaseApp = firebase.initializeApp({ 
apiKey: "AIzaSyCWs_SUCQ4uB_3KNV_YcGpeMRGb892mthc",
authDomain: "postapic-1af5e.firebaseapp.com",
projectId: "postapic-1af5e",
storageBucket: "postapic-1af5e.appspot.com",
messagingSenderId: "585042060228",
appId: "1:585042060228:web:9062a72b7f3bfcb835ba91"

});
const db = firebaseApp.firestore();
const auth = firebaseApp.auth();

// Sign Up

function SignUp() {
   const email = document.getElementById("email").value;
   const password = document.getElementById("password").value;
   console.log(email, password);

   firebase.auth().createUserWithEmailAndPassword(email, password)   // code from official firebase documentation
      .then((result) => {
         // Signed up 
         window.alert("You are Signed Up");
         console.log(result);
         // ...
      })
      .catch((error) => {
        console.log(error.code);
        console.log(error.message);
        window.alert("Error: " + error.message);
         // ..
      });
}

function SignIn() {
   const email = document.getElementById("email").value;
   const password = document.getElementById("password").value;
   console.log(email, password);

   firebase.auth().signInWithEmailAndPassword(email, password)
  .then((result) => {
    // Signed in
      window.alert("You are Signed In");
      console.log(result);
      window.location.href = "homepage.php";
      // ...
  })
  .catch((error) => {
      console.log(error.code);
      console.log(error.message);
      window.alert("Error: " + error.message);
  });
}