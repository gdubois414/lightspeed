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
                <td><button class="plain-button" @click="$emit('showProject', project.id, 'user')">{{ project.name }}</button></td>
                <td>
                    <span v-for="(user, index) in project.users">
                        <button class="plain-button" @click="$emit('showUser', user.name, 'user')">{{ user.name | capitalize }}</button><span v-if="index !== project.users.length - 1">, </span>
                    </span>
                </td>
                <td>
                    {{ project.total_hours }}
                </td>
                <td>
                    <button class="button" @click="$emit('showProject', project.id, 'user')">View</button>
                </td>
            </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
    export default {
        props: ['user', 'current-projects'],
    }
</script>
