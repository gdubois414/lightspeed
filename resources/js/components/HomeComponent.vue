<template>
    <div>
        <h1>Users List</h1>

        <table>
            <thead>
            <tr>
                <th>Name</th>
                <th>Projects</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="user in users">
                <td>{{ user.name | capitalize }}</td>
                <td>
                            <span v-for="(project, index) in user.projects">
                                <button class="plain-button" @click="$emit('showProject', project.id, 'home')">{{ project.name }}</button><span v-if="index !== user.projects.length - 1">, </span>
                            </span>
                </td>
                <td>
                    <button class="button" @click="$emit('showUser', user.name, 'home')">View</button>
                </td>
            </tr>

            </tbody>
        </table>
    </div>
</template>

<script>
    export default {
        props: ['users'],

        data(){
            return{}
        }
    }
</script>
