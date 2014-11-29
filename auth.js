function auth() {


OAuth.initialize('xW9ekrUL1dUYZGcebK3PXzEvHQM');  
OAuth.clearCache('provider');              
var promise = OAuth.popup('twitter');

promise.done(function (result) {
   // make API calls
   console.log(result);
   window.location.href='http://cmpe272.netai.net/main.php?loginhandle=twitter';
});

promise.fail(function (error) {
   // handle errors
   console.log("ERROR");
   alert("Please enter correct username and password for twitter");
});
}
 

