from flask import Flask, request, render_template

app = Flask(__name__)

def knapsack(weights, values, capacity):
    item_count = len(weights)
    dp = [0] * (capacity + 1)
    selected_items = [[0] * item_count for _ in range(capacity + 1)]

    for i in range(item_count):
        for w in range(capacity, weights[i] - 1, -1):
            if dp[w] < dp[w - weights[i]] + values[i]:
                dp[w] = dp[w - weights[i]] + values[i]
                selected_items[w] = selected_items[w - weights[i]].copy()
                selected_items[w][i] += 1

    return dp[capacity], selected_items[capacity]

@app.route('/', methods=['GET', 'POST'])
def index():
    if request.method == 'POST':
        weights = list(map(int, request.form.get('weights').split(',')))
        values = list(map(int, request.form.get('values').split(',')))
        capacity = int(request.form.get('capacity'))

        optimal_value, item_counts = knapsack(weights, values, capacity)
        return render_template('index.html', optimal_value=optimal_value, item_counts=item_counts)

    return render_template('index.html', optimal_value=None, item_counts=None)

if __name__ == '__main__':
    app.run(debug=True)
