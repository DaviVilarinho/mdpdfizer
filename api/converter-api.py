import pypandoc
from flask import Flask, json, jsonify, url_for, request
from markupsafe import escape
from uuid import uuid4

pypandoc.ensure_pandoc_installed()

OUTPUT_DIR  = "/api/out/"

DEFAULT_METHOD = 'POST'
DEFAULT_METHODS=[DEFAULT_METHOD]
converter = Flask(__name__)

@converter.route("/", methods=DEFAULT_METHODS)
def convertDoc():
    mdSource    = request.form.get('mdSource')
    mdType      = request.form.get('mdType')
    outType     = request.form.get('outType')

    UUID = str(uuid4())
    outFilepath = OUTPUT_DIR + UUID + ".pdf"
    pypandoc.convert_text(source=mdSource, format=mdType, to=outType, encoding='unicode', outputfile=outFilepath)

    return jsonify({
        "uuid": UUID,
        "mdType": mdType,
        "outType": outType,
        "outputPath": outFilepath,
    })

if __name__ == "__main__":
    converter.run(host="0.0.0.0")