from flask import Flask, request, send_file

app = Flask(__name__)

@app.route('/')
def index():
    return '''
        <form action='/upload' method='post' enctype='multipart/form-data'>
            <input type='file' name='file'>
            <input type='submit' value='Upload'>
        </form>
    '''

@app.route('/upload', methods=['POST'])
def upload():
    file = request.files['file']
    file.save('/download' + file.filename)
    return 'File uploaded successfully'

@app.route('/download/<filename>')
def download(filename):
    return send_file('/download' + filename, as_attachment=True)

if __name__ == '__main__':
    app.run(debug=True)
