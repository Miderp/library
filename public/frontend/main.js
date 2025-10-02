 // Function to show/hide sections
function showSection(sectionId) {
    // Hide all sections
    document.querySelectorAll('[id$="-section"]').forEach(section => {
        section.classList.add('hidden');
    });

    // Show the selected section
    document.getElementById(`${sectionId}-section`).classList.remove('hidden');

    // Update the section title
    const titles = {
        'dashboard': 'Dashboard',
        'books': 'Books Management',
        'members': 'Members Management',
        'borrow': 'Borrow/Return Management',
    }
}
