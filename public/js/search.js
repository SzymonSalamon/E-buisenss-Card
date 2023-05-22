const search = document.querySelector('input[placeholder="search project"]');
const projectContainer = document.querySelector(".projects");

search.addEventListener("keyup", function (event) {
    if (event.key === "Enter") {
        event.preventDefault();

        const data = {search: this.value};

        fetch("/search", {
            method: "POST",
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(data)
        }).then(function (response) {
            return response.json();
        }).then(function (projects) {
            projectContainer.innerHTML = "";
            loadProjects(projects)
        });
    }
});

function loadProjects(projects) {
    projects.forEach(project => {
        console.log(project);
        createProject(project);
    });
}

function createProject(project) {
    const template = document.querySelector("#project-template");

    const clone = template.content.cloneNode(true);
    const front = clone.querySelector(".front");
    const back = clone.querySelector(".back");
    front.style.backgroundColor = project.background;
    back.style.backgroundColor = project.background;
    const div = clone.querySelector(".container");
    div.id = project.id;
    const image = clone.querySelector(".inclogo").getElementsByTagName('img')[0];
    image.src = `/public/uploads/${project.logo}`;
    const back_image = clone.querySelector(".back").querySelector(".inclogo").getElementsByTagName('img')[0];
    back_image.src = `/public/uploads/${project.logo}`;
    const company = clone.querySelector(".company");
    company.innerHTML = project.company;
    const description = clone.querySelector(".description");
    description.innerHTML = project.description;
    const skills = clone.querySelector(".skills");
    skills.innerHTML = project.skill;
    const name = clone.querySelector(".name");
    name.innerHTML = project.surname +"<br>"+ project.p_name ;
    const phone = clone.querySelector(".phonenumber");
    phone.innerHTML = project.phone;
    const location = clone.querySelector(".locationvalue");
    location.innerHTML = project.location;
    const site = clone.querySelector(".wwwvalue");
    site.innerHTML = project.www;
    const email = clone.querySelector(".emailvalue");
    email.innerHTML = project.email;
    const short = clone.querySelector(".short");
    short.innerHTML = project.company + "<br>" + project.surname + "<br>" + project.p_name;
    const fblink = clone.querySelector(".logos").getElementsByTagName('a')[0];
    fblink.src = `${project.fb_link}`;
    const instalink = clone.querySelector(".logos").getElementsByTagName('a')[1];
    instalink.src = `${project.instagram_link}`;
    const linkedinlink = clone.querySelector(".logos").getElementsByTagName('a')[2];
    linkedinlink.src = `${project.linkedin_link}`;
    projectContainer.appendChild(clone);
}