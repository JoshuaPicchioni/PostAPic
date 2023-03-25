 // setting up firebase authentication for user registration

<script>
   const firebaseApp = firebase.initializeApp({ /* Firebase config */ });
   const db = firebaseApp.firestore();
   const auth = firebaseApp.auth();
</script>