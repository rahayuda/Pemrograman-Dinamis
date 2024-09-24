from flask import Flask, render_template, request

app = Flask(__name__)

# Fungsi Fibonacci menggunakan pendekatan dinamis
def fibonacci(n):
    if n <= 1:
        return n
    
    # Inisialisasi array untuk menyimpan nilai Fibonacci
    fib = [0] * (n + 1)
    fib[1] = 1

    for i in range(2, n + 1):
        fib[i] = fib[i - 1] + fib[i - 2]

    return fib[n]

@app.route('/', methods=['GET', 'POST'])
def index():
    fib_value = None
    if request.method == 'POST':
        try:
            n = int(request.form['number'])
            fib_value = fibonacci(n)
        except ValueError:
            fib_value = "Input harus berupa angka."
    
    return render_template('index.html', fib_value=fib_value)

if __name__ == '__main__':
    app.run(debug=True)
