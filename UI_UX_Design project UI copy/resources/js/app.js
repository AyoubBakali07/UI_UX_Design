import './bootstrap';

// Get the modal and the close button
const modal = document.getElementById('editRealisationModal');
const closeModalButton = modal.querySelector('.close-modal');
const form = document.getElementById('editRealisationForm');

// Get all buttons that open the modal
const editButtons = document.querySelectorAll('.edit-realisation-button');

// Function to open the modal
function openModal() {
    modal.classList.remove('hidden');
}

// Function to close the modal
function closeModal() {
    modal.classList.add('hidden');
    form.reset(); // Reset form when closing
}

// Add event listeners to the edit buttons
editButtons.forEach(button => {
    button.addEventListener('click', async (e) => {
        e.preventDefault();
        
        const tutorialId = button.dataset.tutorialId;
        const realisationId = button.dataset.realisationId;
        
        // Set the tutorial ID in the form
        document.getElementById('tutorial_id').value = tutorialId;
        document.getElementById('realisation_id').value = realisationId || '';
        
        // If we have a realisation ID, fetch the existing data
        if (realisationId) {
            try {
                const response = await fetch(`/api/realisations/${realisationId}`, {
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                        'Accept': 'application/json'
                    },
                    credentials: 'same-origin' // Add this to include cookies
                });
                const data = await response.json();
                
                // Populate form fields
                document.getElementById('modalStatus').value = data.etat;
                document.getElementById('modalGithubLink').value = data.github_link || '';
                document.getElementById('modalProjectLink').value = data.project_link || '';
                document.getElementById('modalSlideLink').value = data.slide_link || '';
            } catch (error) {
                console.error('Error fetching realisation data:', error);
            }
        }
        
        openModal();
    });
});

// Handle form submission
form.addEventListener('submit', async (e) => {
    e.preventDefault();
    
    const realisationId = document.getElementById('realisation_id').value;
    const formData = new FormData(form);
    
    try {
        const url = realisationId 
            ? `/api/realisations/${realisationId}`
            : '/api/realisations';
            
        const response = await fetch(url, {
            method: realisationId ? 'PUT' : 'POST',
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                'Accept': 'application/json',
                'Content-Type': 'application/json'
            },
            credentials: 'same-origin', // Add this to include cookies
            body: JSON.stringify({
                tutorial_id: formData.get('tutorial_id'),
                etat: formData.get('status'),
                github_link: formData.get('github_link'),
                project_link: formData.get('project_link'),
                slide_link: formData.get('slide_link')
            })
        });
        
        if (response.ok) {
            closeModal();
            // Optionally refresh the page or update the UI
            window.location.reload();
        } else {
            const error = await response.json();
            alert('Error saving realisation: ' + (error.message || 'Unknown error'));
        }
    } catch (error) {
        console.error('Error submitting form:', error);
        alert('Error saving realisation. Please try again.');
    }
});

// Add event listener to the close button
closeModalButton.addEventListener('click', closeModal);

// Close the modal if the user clicks outside of it
window.addEventListener('click', (e) => {
    if (e.target === modal) {
        closeModal();
    }
});
