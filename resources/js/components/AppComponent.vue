<template>
    <div id="#app">
        <HomeScreen v-if="currentScreen == 'home'" :users="users" @showUser="showUser"></HomeScreen>
        <UserScreen v-if="currentScreen == 'user'" :user="currentUser"></UserScreen>
    </div>
</template>

<script>

    function User({ id, name, projects}) {
        this.id = id;
        this.name = name;
        this.projects = projects;
    }

    function Project({ id, name, users}) {
        this.id = id;
        this.name = name;
        this.users = users;
    }

    import HomeScreen from "./HomeComponent";
    import UserScreen from "./UserComponent";

    export default {
        components: {HomeScreen, UserScreen},
        data(){
            return {
                currentScreen: 'home',
                users: [],
                projects: [],
                currentUser: {},
                currentProject: {}
            }
        },
        methods: {
            getUsers(){
                window.axios.get('/api/users')
                    .then(({ data }) => {
                        data.forEach(user => {
                            this.users.push((new User(user)));
                        })
                        console.log(this.users);
                    });
            },

            showUser(id){
                let self = this;
                window.axios.get(`/api/user/${id}`)
                    .then(({ data }) => {
                        self.currentUser = data;
                        self.currentScreen = 'user';
                        // console.log(data);
                    });
            },

            getProjects(){
                window.axios.get('/api/projects')
                    .then(({ data }) => {
                        data.forEach(project => {
                            this.projects.push((new Project(project)));
                        })
                        console.log(this.projects);
                    });
            },

            showProject(id){
                console.log(id);
            }
        },

        created(){
            this.getUsers();
            // this.getProjects();
        }
    }
</script>
