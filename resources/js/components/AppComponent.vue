<template>
    <div id="#app">
        <HomeScreen v-if="currentScreen === 'home'" :users="users" @showUser="showUser" @showProject="showProject"></HomeScreen>
        <UserScreen v-if="currentScreen === 'user'" :user="currentUser" @showUser="showUser" @showProject="showProject"></UserScreen>
        <ProjectScreen v-if="currentScreen === 'project'" :project="currentProject" @showUser="showUser" @goBack="goBack"></ProjectScreen>
    </div>
</template>

<script>
    import HomeScreen from "./HomeComponent";
    import UserScreen from "./UserComponent";
    import ProjectScreen from "./ProjectComponent";

    export default {
        components: {HomeScreen, UserScreen, ProjectScreen},
        data(){
            return {
                currentScreen: '',
                previousScreen: 'home',
                users: [],
                currentUser: {},
                currentProject: {}
            }
        },
        methods: {
            // Fetch all of the users to create a home screen
            getUsers(){
                let self = this;
                window.axios.get('/api/users')
                    .then(({ data }) => {
                        self.users = data;

                        //Set which component to display
                        self.currentScreen = 'home';
                    });
            },

            //Get a single user's data and set which screen the function call came from to keep track of the back button on the Project page
            showUser(name, screen){
                let self = this;
                window.axios.get(`/api/user/${name}`)
                    .then(({ data }) => {
                        self.currentUser = data;
                        self.currentScreen = 'user';

                        //Update the window history to reflect the current user. Now if someone refreshes the same user/view will display
                        window.history.pushState({}, "To-Do List", `?user=${self.currentUser.name}`);
                    });

                this.previousScreen = screen;
            },

            //Similar to user function, but for a project
            showProject(id, screen){
                let self = this;
                window.axios.get(`/api/project/${id}`)
                    .then(({ data }) => {
                        self.currentProject = data;
                        self.currentScreen = 'project';

                        //Reset the window history
                        window.history.pushState({}, "To-Do List", '/');
                    });

                this.previousScreen = screen;
            },

            //If the page is loaded with a user parameter, show that instead of the standard home screen
            checkForUser(){
                let params = new URLSearchParams(window.location.search);
                let user = params.get('user');

                if(user){
                    this.showUser(user);
                }
                else{
                    this.getUsers();
                }
            },

            //Handle the back button from the project screen
            goBack(){
                //If we are going to a user screen, update the window history accordingly.
                if(this.previousScreen === 'user'){
                    window.history.pushState({}, "To-Do List", `?user=${this.currentUser.name}`);
                }
                this.currentScreen = this.previousScreen;
            }
        },

        created(){
            //On load check if there is a user url parameter and get the appropriate data.
            this.checkForUser();
        }
    }
</script>
