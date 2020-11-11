window.addEventListener('load',()=>{

    const skills = document.querySelectorAll('.skill_level');

    for( skill of skills){
        skill.style.width=skill.dataset.width
        skill.style.background=skill.dataset.background
    }

})