from fpdf import FPDF
import os

def read_text_file(file_path):
    """Read content from a text file."""
    if not os.path.exists(file_path):
        raise FileNotFoundError(f"{file_path} not found.")
    with open(file_path, "r", encoding="utf-8") as file:
        return file.readlines()

def generate_pdf(text_lines, output_path="output.pdf"):
    """Generate a PDF from text lines."""
    pdf = FPDF()
    pdf.add_page()
    pdf.set_font("Arial", size=12)

    pdf.cell(200, 10, txt="Text to PDF Report", ln=True, align="C")
    pdf.ln(10)  # Add space

    for line in text_lines:
        pdf.multi_cell(0, 10, line.strip())

    pdf.output(output_path)
    print(f"PDF created: {output_path}")

if __name__ == "__main__":
    input_file = "test.txt"   # Change this to your text file name
    output_file = "output.pdf" # Change this if you want a different output name

    try:
        lines = read_text_file(input_file)
        generate_pdf(lines, output_file)
    except Exception as e:
        print(f"Error: {e}")
