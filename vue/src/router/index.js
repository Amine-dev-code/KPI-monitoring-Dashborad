import { createRouter, createWebHistory } from 'vue-router'
import DelUsers from '../views/DelUsers.vue'
import Home from '../views/Global.vue'
import login from '../views/login.vue'
import Time from '../views/Time.vue'
import Unites from '../views/Unites.vue'
import Users from '../views/Users.vue'
import Roles from '../views/Roles.vue'
import Globdash from '../views/Globdash.vue'
import Dashboardglob from '../views/Dashboardglob.vue'
import Dashboardfin from '../views/Dashboardfin.vue'
import NotFound from '../views/NotFound.vue'
//import { isAdmin, isUser } from '../middleware/middleware';
/*function Auth(to, from, next) {
  let auth=window.localStorage.getItem('token');
   // For example, check if the user has the 'admin' role in your authentication state.
   if (auth) {
     router.go(-1); // Proceed to the next route.
   } 
   else{
      return next();
   }
}*/
const routes = [
    {
      path: '/',
      name: 'Global',
      component: Home,
      //beforeEnter: isAdmin
      
    },
    {
      path: '/unites',
      name: 'unites',
      component: Unites,
      //beforeEnter: isAdmin
      
    },
    {
      path: '/users',
      name: 'users',
      component: Users,
      //beforeEnter: isAdmin
      
    },
    {
      path: '/DelUsers',
      name: 'trashed',
      component: DelUsers,
      //beforeEnter: isAdmin
      
    },
    {
      path: '/timing',
      name: 'Timing',
      component: Time,
      //beforeEnter: isAdmin
      
    },
    {
      path: '/roles/:id',
      name: 'Roles',
      component: Roles,
      props:true,
      //beforeEnter: isAdmin
      
    },
    {
      path: '/globdash',
      name: 'Globdash',
      component: Globdash,
      //beforeEnter: isUser
      
      
    },
    {
      path: '/Dashboard/global/:id',
      name: 'Dashboardglob',
      component: Dashboardglob,
      props:true,
      //beforeEnter: isUser
      
    },
    {
      path: '/Dashboard/finance/:id',
      name: 'Dashboardfin',
      component: Dashboardfin,
      props:true,
      //beforeEnter: isUser
      
    },
    {
      path: '/login',
      name: 'login',
      component: login,
      //beforeEnter: Auth
    },
    {
      path:'/:catchAll(.*)',
      name:'NotFound',
      component:NotFound
    }
   
   
  
  ]
  
  const router = createRouter({
    history: createWebHistory(import.meta.env.BASE_URL),
    routes
  })
  


export default router
