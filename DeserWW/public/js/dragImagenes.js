const dropArea = document.getElementById('drop-area');
        const fileInput = document.getElementById('fileInput');
        const imagePreview = document.getElementById('image-preview');

        function dragOverHandler(event) {
            event.preventDefault();
        }

        function dragEnterHandler(event) {
            dropArea.classList.add('highlight');
        }

        function dragLeaveHandler(event) {
            dropArea.classList.remove('highlight');
        }

        function dropHandler(event) {
            event.preventDefault();
            dropArea.classList.remove('highlight');

            const files = event.dataTransfer.files;
            handleFiles(files);
        }

        function handleFiles(files) {
            for (const file of files) {
                if (file.type.match('image.*')) {
                    const reader = new FileReader();
                    reader.onload = function (e) {
                        const image = document.createElement('img');
                        image.src = e.target.result;
                        image.classList.add('preview-image');
                        imagePreview.appendChild(image);
                    };
                    reader.readAsDataURL(file);

                    // Añadir los archivos al input para que se envíen en el formulario
                    const dataTransfer = new DataTransfer();
                    for (const file of files) {
                        dataTransfer.items.add(file);
                    }
                    fileInput.files = dataTransfer.files;
                }
            }
        }