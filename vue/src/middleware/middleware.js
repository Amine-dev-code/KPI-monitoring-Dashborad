// middleware.js
/*
export function isAdmin(to, from, next) {
   let auth=localStorage.getItem('token');
   let userIsAdmin=localStorage.getItem('role');
    // For example, check if the user has the 'admin' role in your authentication state.
    if (auth && userIsAdmin=='admin'||auth && userIsAdmin=='superadmin') {
      next(); // Proceed to the next route.
    } else if(!auth) {
      return next('/login') // Redirect to an unauthorized page or handle it as needed.
    }
    else{
        return next('/globdash')
    }
  }
  
  export function isUser(to, from, next) {
    let auth=localStorage.getItem('token');
    let IsUser=localStorage.getItem('role');
     // For example, check if the user has the 'admin' role in your authentication state.
     if (auth && IsUser=='user') {
       next(); // Proceed to the next route.
     } else if (!auth) {
        return next('/login'); // Redirect to an unauthorized page or handle it as needed.
     }
     else{
        return next('/')
     }
  }
  
  */