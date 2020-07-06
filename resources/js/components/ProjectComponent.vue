<template>
    <div>
        <header class="page-header">
            <h1>{{ project.name }}</h1>
            <p class="hours-estimate">{{ project.total_hours }} hours</p>
        </header>

        <table>
            <thead>
                <tr>
                    <th>Task</th>
                    <th>Assigned To</th>
                    <th>Estimated Hours</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="task in project.tasks">
                    <td>{{ task.name }}</td>
                    <td><button class="plain-button" @click="$emit('showUser', task.user)">{{ task.user | capitalize }}</button></td>
                    <td>{{ task.hours_estimate }}</td>
                </tr>
            </tbody>
        </table>

        <div class="page-actions">
            <button @click="$emit('goBack')" class="button button--large">Back</button>
        </div>
    </div>


</template>

<script>
    export default {
        props: ['project'],
    }
</script>
