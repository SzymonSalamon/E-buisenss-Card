const Container = document.querySelector(".menu");

fetch("/searchMyProject", {
    method: "POST",
    headers: {
        'Content-Type': 'application/json'
    },
}).then(function (response) {
    return response.json();
}).then(function (projects) {
    Container.innerHTML = "";
    loadPuzlles(projects)
});

function loadPuzlles(projects) {
    projects.forEach(project => {
        console.log(project);
        createPuzzle(project);
    });
}

function createPuzzle(project) {
    const template = document.querySelector("#puzzle");
    const clone = template.content.cloneNode(true);
    const div = clone.querySelector(".myProject");
    div.innerHTML = project.project_name;
    const id = clone.querySelector(".hidden");
    id.value = project.project_id;
    Container.appendChild(clone);
}