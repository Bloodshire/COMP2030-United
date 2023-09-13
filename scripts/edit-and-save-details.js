let editingEnabled = false;

        function enableEdit() {
            if (!editingEnabled) {
                document.getElementById("firstName").removeAttribute("readonly");
                document.getElementById("lastName").removeAttribute("readonly");
                document.getElementById("email").removeAttribute("readonly");
                document.getElementById("password").removeAttribute("readonly");
                document.getElementById("permitNumber").removeAttribute("readonly");
                editingEnabled = true;
            }
        }

        function saveDetails() {
            if (editingEnabled) {
                document.getElementById("firstName").setAttribute("readonly", "readonly");
                document.getElementById("lastName").setAttribute("readonly", "readonly");
                document.getElementById("email").setAttribute("readonly", "readonly");
                document.getElementById("password").setAttribute("readonly", "readonly");
                document.getElementById("permitNumber").setAttribute("readonly", "readonly");
                editingEnabled = false;
            }
        }