from flask import Flask, render_template, request

app = Flask(__name__)

# Fungsi Fibonacci menggunakan memoization
def fibonacci(n, memo):
    if n <= 1:
        return n
    if memo[n] != -1:
        return memo[n]
    memo[n] = fibonacci(n-1, memo) + fibonacci(n-2, memo)
    return memo[n]

@app.route('/', methods=['GET', 'POST'])
def index():
    fib_value = None
    if request.method == 'POST':
        try:
            n = int(request.form['number'])
            # Inisialisasi memoization array
            memo = [-1] * (n + 1)
            fib_value = fibonacci(n, memo)
        except ValueError:
            fib_value = "Input harus berupa angka."
    
    return render_template('index.html', fib_value=fib_value)

if __name__ == '__main__':
    app.run(debug=True)
