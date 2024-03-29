<script>
    document.addEventListener('DOMContentLoaded', function() {
        const deleteButtons = document.querySelectorAll('.delete-action-btn');

        deleteButtons.forEach(function(button) {
            button.addEventListener('click', function(event) {
                event.preventDefault();

                const actionId = this.dataset.actionId;
                const actionType = this.dataset.actionType;
                const quizID = this.dataset.quizID;

                console.log('Action ID:', actionId);
                console.log('Action Type:', actionType);
                console.log('Quiz ID:', quizID);

                // Show SweetAlert confirmation dialog
                Swal.fire({
                    title: 'Are you sure?',
                    text: 'You will not be able to revert this action!',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#3085d6',
                    confirmButtonText: 'Yes, delete it!',
                }).then((result) => {
                    if (result.isConfirmed) {
                        // If user confirms, submit the corresponding form
                        const form = document.getElementById('delete-form-' +
                            actionType + '-' + actionId);
                        console.log('Form:', form);
                        form.submit();
                    }
                });
            });
        });
    });
</script>
