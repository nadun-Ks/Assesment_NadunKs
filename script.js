document.addEventListener('DOMContentLoaded', () => {
    async function fetchTasks() {
        try {
            const response = await fetch('api/getTasks.php');
            const data = await response.json();

            const taskContainer = document.getElementById('taskContainer');
            taskContainer.innerHTML = '';
            
            // consoe.log("get");

            if (data.tasks && data.tasks.length > 0) {
            data.tasks.forEach(task => {
                // const taskCard = `
                //     <div class="card mt-3">
                //         <div class="card-body">
                //             <div class="row">
                //                 <div class="col-md-8">
                //                     <h5 class="card-title">${task.title}</h5>
                //                     <p class="card-text">${task.description}</p>
                //                 </div>
                //                 <div class="col-md-4 d-flex flex-column justify-content-end align-items-end">
                //                         ${task.is_completed == 1 
                //                         ? '<p style="color:#198754"><b>Completed</b></p>' 
                //                         : `<a href="#" class="btn btn-success" style="width: 100px;" onclick="markAsDone(${task.id})">
                //                             <i class="bi bi-check-circle me-2"></i> Done
                //                         </a>`}
                //                 </div>
                //             </div>
                //         </div>
                //     </div>
                // `;
                
                const taskCard = `
                    <div class="card mt-3">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-8">
                                    <h5 class="card-title">${task.title}</h5>
                                    <p class="card-text">${task.description}</p>
                                </div>
                                <div class="col-md-4 d-flex flex-column justify-content-end align-items-end">
                                       
                                        <a href="#" class="btn btn-success" style="width: 100px;" onclick="markAsDone(${task.id})">
                                            <i class="bi bi-check-circle me-2"></i> Done
                                        </a>
                                </div>
                            </div>
                        </div>
                    </div>
                `;

                taskContainer.innerHTML += taskCard;
            });
            } else {
                taskContainer.innerHTML = `
                    <div class="card mt-3">
                        <div class="card-body text-center">
                            <b>No tasks found</b>
                        </div>
                    </div>
                `;
            }
        } catch (error) {
            console.error('Error fetching tasks:', error);
            const taskContainer = document.getElementById('taskContainer');
            taskContainer.innerHTML = `
                <div class="card mt-3">
                    <div class="card-body text-center">
                        <b>Error loading tasks</b>
                    </div>
                </div>
            `;
        }
    }

    fetchTasks();

    document.getElementById('taskForm').addEventListener('submit', async function (e) {
        e.preventDefault();

        const title = document.getElementById('title').value;
        const description = document.getElementById('description').value;
        // alert("Yes");
        // console.log('call post');
        try {
            const response = await fetch('api/addTasks.php', {
                method: 'POST',
                body: new URLSearchParams({
                    title: title,
                    description: description
                })
            });

            const data = await response.json();
            const responseMessage = document.getElementById('responseMessage');

            fetchTasks();

            if (response.ok) {
                responseMessage.innerHTML = `<div class="alert alert-success">${data.message}</div>`;
                document.getElementById('taskForm').reset();
            } else {
                responseMessage.innerHTML = `<div class="alert alert-danger">${data.error}</div>`;
            }

            setTimeout(() => {
                responseMessage.querySelector('.alert').classList.add('fade-out');
                // responseMessage.innerHTML = '';
            }, 3000);

            setTimeout(() => {
                responseMessage.innerHTML = '';
            }, 4000);

        } catch (error) {
            console.error('Error:', error);
            const responseMessage = document.getElementById('responseMessage');
            responseMessage.innerHTML = `<div class="alert alert-danger">Something went wrong. Please try again later.</div>`;
        }
    });

    window.markAsDone = async function (taskId) {
        try {
            const response = await fetch('api/markTaskAsDone.php', {
                method: 'POST',
                body: new URLSearchParams({
                    task_id: taskId
                })
            });

            const data = await response.json();

            // console.log('call done');

            if (data.status === 'success') {
                fetchTasks();
            } else {
                console.error('Error marking task as completed:', data.message);
            }
        } catch (error) {
            console.error('Error:', error);
        }
    }

});