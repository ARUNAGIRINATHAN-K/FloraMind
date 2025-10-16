// script.js
document.addEventListener('DOMContentLoaded', () => {
    const form = document.getElementById('predictionForm');
    const resultDiv = document.getElementById('result');
    const predictionOutput = document.getElementById('predictionOutput');
    const pastPredictions = document.getElementById('pastPredictions');

    // Real-time previews
    const inputs = {
        sepalLength: document.getElementById('sepalLength'),
        sepalWidth: document.getElementById('sepalWidth'),
        petalLength: document.getElementById('petalLength'),
        petalWidth: document.getElementById('petalWidth')
    };

    Object.keys(inputs).forEach(key => {
        inputs[key].addEventListener('input', (e) => {
            document.getElementById(`${key}Preview`).textContent = e.target.value || 0;
        });
    });

    // Form submission
    form.addEventListener('submit', async (e) => {
        e.preventDefault();
        const formData = new FormData(form);

        try {
            const response = await fetch('predict.php', {
                method: 'POST',
                body: formData
            });
            // Robustly parse JSON and handle non-JSON errors
            const contentType = response.headers.get('content-type') || '';
            let data;
            if (contentType.includes('application/json')) {
                data = await response.json();
            } else {
                const text = await response.text();
                throw new Error(`Unexpected response. Status ${response.status}. Body: ${text?.slice(0, 200)}`);
            }

            if (response.ok && data && data.success) {
                const species = data.prediction;
                const iconClass = species.toLowerCase();
                predictionOutput.innerHTML = `
                    <div class="result-icon ${iconClass}">🌸</div>
                    <p><strong>Predicted Species:</strong> Iris ${species}</p>
                `;
                resultDiv.classList.remove('d-none');
                loadPastPredictions();
            } else {
                const errMsg = (data && data.error) ? data.error : 'Unknown error';
                alert('Error: ' + errMsg);
            }
        } catch (error) {
            alert('Failed to predict: ' + error.message);
        }
    });

    // Load past predictions
    async function loadPastPredictions() {
        try {
            const response = await fetch('predict.php?action=get_past');
            const contentType = response.headers.get('content-type') || '';
            if (!response.ok) {
                const text = await response.text();
                throw new Error(`Failed to load history (${response.status}): ${text?.slice(0, 200)}`);
            }
            if (!contentType.includes('application/json')) {
                const text = await response.text();
                throw new Error(`Unexpected response for history. Body: ${text?.slice(0, 200)}`);
            }
            const data = await response.json();
            pastPredictions.innerHTML = '';
            data.forEach(row => {
                const tr = document.createElement('tr');
                tr.innerHTML = `
                    <td>${row.id}</td>
                    <td>${row.sepal_length}</td>
                    <td>${row.sepal_width}</td>
                    <td>${row.petal_length}</td>
                    <td>${row.petal_width}</td>
                    <td>${row.prediction}</td>
                    <td>${row.timestamp}</td>
                `;
                pastPredictions.appendChild(tr);
            });
        } catch (error) {
            console.error('Failed to load past predictions:', error);
        }
    }

    loadPastPredictions();
});