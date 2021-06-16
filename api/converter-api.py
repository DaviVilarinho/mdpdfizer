import pypandoc
from flask import Flask, json, jsonify, url_for, request
from markupsafe import escape
from uuid import uuid4

INPUT_DIR   = "./in/"
OUTPUT_DIR  = "./out/"

DEFAULT_METHOD = 'POST'
DEFAULT_METHODS=[DEFAULT_METHOD]
converter = Flask(__name__)

@converter.route("/", methods=DEFAULT_METHODS)
def convertDoc():
    error = None
    mdSource    = request.args.get('mdSource', '')
    mdType      = request.args.get('mdType', '')
    outType     = request.args.get('outType')

    UUID = str(uuid4())
    outFilepath = OUTPUT_DIR + UUID + ".pdf"
    output = pypandoc.convert_text(mdSource, format=mdType, to=outType, outputfile=outFilepath)

    if (output):
        return jsonify({
            "uuid": UUID,
            "mdType": mdType,
            "outType": outType,
            "outputPath": outFilepath,
            "mdSource": mdSource,
        })
    else:
        return -1

if __name__ == "__main__":
    converter.run()