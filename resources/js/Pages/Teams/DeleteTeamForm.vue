<template>
    <action-section>
        <template #title>
            Delete Team
        </template>

        <template #description>
            Permanently delete this team.
        </template>

        <template #content>
            <div class="max-w-xl text-sm text-gray-600">
                Once a team is deleted, all of its resources and data will be permanently deleted. Before deleting this team, please download any data or information regarding this team that you wish to retain.
            </div>

            <div class="mt-5">
                <danger-button @click.native="confirmTeamDeletion">
                    Delete Team
                </danger-button>
            </div>

            <!-- Delete Team Confirmation Modal -->
            <confirmation-modal :show="confirmingTeamDeletion" @close="confirmingTeamDeletion = false">
                <template #title>
                    Delete Team
                </template>

                <template #content>
                    Are you sure you want to delete this team? Once a team is deleted, all of its resources and data will be permanently deleted.
                </template>

                <template #footer>
                    <secondary-button @click.native="confirmingTeamDeletion = false">
                        Nevermind
                    </secondary-button>

                    <danger-button class="ml-2" @click.native="deleteTeam" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                        Delete Team
                    </danger-button>
                </template>
            </confirmation-modal>
        </template>
    </action-section>
</template>

<script>
    import ActionSection from '@/Components/ActionSection'
    import ConfirmationModal from '@/Components/ConfirmationModal'
    import DangerButton from '@/Components/DangerButton'
    import SecondaryButton from '@/Components/SecondaryButton'

    export default {
        props: ['team'],

        components: {
            ActionSection,
            ConfirmationModal,
            DangerButton,
            SecondaryButton,
        },

        data() {
            return {
                confirmingTeamDeletion: false,
                deleting: false,

                form: this.$inertia.form()
            }
        },

        methods: {
            confirmTeamDeletion() {
                this.confirmingTeamDeletion = true
            },

            deleteTeam() {
                this.form.delete(route('teams.destroy', this.team), {
                    errorBag: 'deleteTeam'
                });
            },
        },
    }
</script>
