def setZeroes(matrix):
    if not matrix:
        return
    
    m, n = len(matrix), len(matrix[0])
    zero_rows = [False] * m
    zero_cols = [False] * n
    
    # Step 1: Mark rows and columns containing 0's
    for i in range(m):
        for j in range(n):
            if matrix[i][j] == 0:
                zero_rows[i] = True
                zero_cols[j] = True
    
    # Step 2: Set entire rows and columns to 0
    for i in range(m):
        for j in range(n):
            if zero_rows[i] or zero_cols[j]:
                matrix[i][j] = 0

# Example usage:
matrix = [
    [1, 2, 3],
    [4, 0, 6],
    [7, 8, 9]
]

setZeroes(matrix)

for row in matrix:
    print(row)
