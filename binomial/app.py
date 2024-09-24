from flask import Flask, request, render_template
from scipy.special import comb

app = Flask(__name__)

@app.route('/')
def index():
    return render_template('index.html')

@app.route('/calculate', methods=['POST'])
def calculate():
    n = int(request.form['n'])
    k = int(request.form['k'])
    
    # Menggunakan scipy.special.comb untuk menghitung koefisien binomial
    result = int(comb(n, k, exact=True))  # exact=True memastikan hasil integer
    
    return render_template('index.html', result=result, n=n, k=k)

if __name__ == '__main__':
    app.run(debug=True)
