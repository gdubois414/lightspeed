<template>
    <div>
        <header class="page-header">
            <h1>{{ user.name | capitalize }}'s Project List</h1>
        </header>

        <table>
            <thead>
                <tr>
                    <th>Project</th>
                    <th>Members</th>
                    <th>Estimated Hours</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
            <tr v-for="project in user.projects">
                <td><button class="plain-button" @click="$emit('showProject', project.id)">{{ project.name }}</button></td>
                <td>
                    <span v-for="user in project.users">{{ user.name | capitalize }}</span>
                </td>
                <td></td>
                <td>
<!--                    <button class="button" @click="$emit('showUser', user.id)">View</button>-->
                </td>
            </tr>
<!--            @foreach($user->projects as $project)-->
<!--            <tr>-->
<!--                <td><a href="/project/{{ $project->slug }}">{{ $project->name }}</a></td>-->
<!--                <td>-->
<!--                    @foreach($project->users as $project_user)-->
<!--                    <a href="/?user={{ $project_user->name }}">{{ ucwords($project_user->name) }}</a>{{ $loop->last ? '' : ', ' }}-->
<!--                    @endforeach-->
<!--                </td>-->
<!--                <td>{{ $project->calculateTotalHours() }}</td>-->
<!--                <td><a href="/project/{{ $project->slug }}" class="button">View</a></td>-->
<!--            </tr>-->
<!--            @endforeach-->

            </tbody>
        </table>
    </div>
</template>

<script>
    export default {
        props: ['user'],

        data(){
            return{}
        },

        methods: {
            getProjectUsers(){
                let users = [];

                this.user.projects.forEach(project => {
                    project['users'] = [];
                    window.axios.get(`/api/project/${project.id}`)
                        .then(({ data }) => {
                            data.forEach(user => {
                                project.users.push(user.users);
                            })
                            console.log(this.user);
                        });


                })




            }
        },

        created(){
            this.getProjectUsers()
        }
    }
</script>
