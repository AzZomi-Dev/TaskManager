<x-layout>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task Manager</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>


    <div class="animate__animated animate__fadeIn">
        <h1 class="title">Task Manager</h1>
        
        <form action="{{ url('/tasks') }}" method="POST" class="task-form animate__animated animate__fadeIn animate__delay-1s">
            @csrf
            <input type="text" name="task" id="taskInput" placeholder="Add a new task..." required class="task-input auto-typing">
            <button type="submit" class="task-btn">Add Task</button>
        </form>
        
        <div class="tasks">
            <ul>
                @foreach($tasks as $task)
                    <li id="task-{{ $task->id }}" class="task-item animate__animated animate__fadeIn animate__delay-{{ $loop->index }}s">
                        <div class="task-content">
                            <span class="task-text">{{ $task->task }}</span>
                            @if ($task->completed_at)
                                <span class="completed-time">
                                    Completed in: {{ gmdate("H:i:s", strtotime($task->completed_at) - strtotime($task->start_time)) }}
                                </span>
                            @else
                                <span class="timer"></span>
                            @endif
                        </div>
                        <div class="task-actions">
                            <!-- Only show the complete button if the task is not completed -->
                            @if (!$task->completed_at)
                                <form action="{{ url('/tasks/' . $task->id . '/complete') }}" method="POST" style="display:inline;" onsubmit="disableButton(this)">
                                    @csrf
                                    <button type="submit" class="complete-btn">✔</button>
                                </form>
                            @endif

                            <form action="{{ url('/tasks/' . $task->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="delete-btn">Delete</button>
                            </form>
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
    
    <script>
document.addEventListener("DOMContentLoaded", function () {
    const taskInput = document.getElementById("taskInput");

    const exampleTasks = ["Groceries", "Exercise", "Homework", "Read Books", "Clean Room", "Cook Dinner"];
    let taskIndex = 0;
    let typingInterval, deleteInterval;
    let isFocused = false;

    function startTypingAnimation() {
        if (!isFocused) {
            typeAndDelete(taskInput, exampleTasks, taskIndex);
        }
    }

    taskInput.addEventListener("focus", function () {
        isFocused = true;

        // Clear animations
        clearInterval(typingInterval);
        clearInterval(deleteInterval);

        // Only clear if it was an auto-typed value
        if (taskInput.getAttribute("data-typing") === "true") {
            taskInput.value = '';
        }

        // Remove typing flag
        taskInput.removeAttribute("data-typing");
    });


    taskInput.addEventListener("blur", function () {
        isFocused = false;
        if (taskInput.value.trim() === '') {
        startTypingAnimation();
    }
    });

    startTypingAnimation();

    function typeAndDelete(inputElement, tasks, index) {
        let currentTask = tasks[index];
        let charIndex = 0;

        inputElement.value = '';
        inputElement.setAttribute("data-typing", true);

        typingInterval = setInterval(() => {
            if (isFocused) {
                clearInterval(typingInterval);
                return;
            }

            if (charIndex < currentTask.length) {
                inputElement.value += currentTask[charIndex];
                charIndex++;
            } else {
                clearInterval(typingInterval);
                setTimeout(() => {
                    deleteTask(inputElement, currentTask, 0, tasks, index);
                }, 1000);
            }
        }, 150);
    }

    function deleteTask(inputElement, currentTask, charIndex, tasks, currentIndex) {
        deleteInterval = setInterval(() => {
            if (isFocused) {
                clearInterval(deleteInterval);
                return;
            }

            if (charIndex < currentTask.length) {
                inputElement.value = inputElement.value.slice(0, -1);
                charIndex++;
            } else {
                clearInterval(deleteInterval);
                let nextIndex = (currentIndex + 1) % tasks.length;
                typeAndDelete(inputElement, tasks, nextIndex);
            }
        }, 100);
    }
});


        function startTimer(taskId, startTime) {
            const taskElement = document.getElementById(`task-${taskId}`);
            const timerElement = taskElement.querySelector('.timer');
            const startTimeTimestamp = new Date(startTime).getTime();

            setInterval(() => {
                const currentTime = new Date().getTime();
                const timeElapsed = currentTime - startTimeTimestamp;
                const seconds = Math.floor(timeElapsed / 1000);
                const minutes = Math.floor(seconds / 60);
                const hours = Math.floor(minutes / 60);

                const displayTime = 
                    String(hours).padStart(2, '0') + ':' +
                    String(minutes % 60).padStart(2, '0') + ':' +
                    String(seconds % 60).padStart(2, '0');

                timerElement.innerText = displayTime;
            }, 1000);
        }

        document.addEventListener("DOMContentLoaded", function () {
            @foreach($tasks as $task)
                @if (!$task->completed_at)
                    startTimer({{ $task->id }}, "{{ \Carbon\Carbon::parse($task->start_time)->toIso8601String() }}");
                @endif
            @endforeach
        });

        document.addEventListener("DOMContentLoaded", function () {
        const toggleBtn = document.getElementById("themeToggle");
        const body = document.body;

        // Load saved theme from localStorage
        if (localStorage.getItem("theme") === "light") {
            body.classList.add("light-mode");
            toggleBtn.textContent = "🌙 Dark Mode";
        }

        toggleBtn.addEventListener("click", () => {
            body.classList.toggle("light-mode");

            if (body.classList.contains("light-mode")) {
                toggleBtn.textContent = "🌙 Dark Mode";
                localStorage.setItem("theme", "light");
            } else {
                toggleBtn.textContent = "🌞 Light Mode";
                localStorage.setItem("theme", "dark");
            }
        });
    });
    </script>
</body>
</html>
</x-layout>