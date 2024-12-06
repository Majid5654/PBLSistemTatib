const ctx = document.querySelector('.activity-chart');
const ctx2 = document.querySelector('.prog-chart');

new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ['M', 'T', 'W', 'T', 'F', 'S', 'S'],
        
        datasets: [{
            label: 'Time',
            data: [8, 6, 7, 6, 10, 8, 4],
            backgroundColor: '#1e293b',
            borderWidth: 3,
            borderRadius: 6,
            hoverBackgroundColor: '#60a5fa'
        }]
    },
    options: {
        responsive: true,
        maintainAspectRatio: false,
        scales: {
            x: {
                border: {
                    display: true
                },
                grid: {
                    display: true,
                    color: '#1e293b'
                }
            },
            y: {
                ticks: {
                    display: false,
                    color: '#f1f3f2'
                }
            },
        },
        plugins: {
            legend: {
                display: false
            }
        },
        animation: {
            duration: 1000,
            easing: 'easeInOutQuad',
        }
    }
});


// Find the Violance link
const violenceLink = document.querySelector('.dropdown');

// Toggle dropdown on click
violenceLink.addEventListener('click', function(event) {
    event.preventDefault(); // Prevent default link behavior
    this.classList.toggle('active'); // Toggle active class to show/hide dropdown
});

document.getElementById('exportPDF').addEventListener('click', function () {
    const { jsPDF } = window.jspdf; // Import jsPDF
    const doc = new jsPDF(); // Create a new PDF document

    // Add title to the PDF
    doc.setFontSize(18);
    doc.text("Attendance Sheet", 14, 15);

    // Export the table as PDF
    doc.autoTable({
        html: '.table', // Select the table
        startY: 20, // Start position on the Y-axis
        theme: 'striped', // Table styling
        headStyles: { fillColor: [76, 110, 245] }, // Header background color
    });

    // Save the PDF with a custom name
    doc.save('Attendance_Sheet.pdf');
});





