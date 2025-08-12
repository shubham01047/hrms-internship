<h2>Payslip - {{ $payroll->month }}</h2>
<p>Employee: {{ $payroll->user->name }}</p>
<p>Basic: {{ $payroll->basic }}</p>
<p>HRA: {{ $payroll->hra }}</p>
<p>Allowances: {{ $payroll->allowances }}</p>
<p>Gross Salary: {{ $payroll->gross_salary }}</p>
<p>Tax: {{ $payroll->tax_amount }}</p>
<p>PF: {{ $payroll->pf_amount }}</p>
<p>ESI: {{ $payroll->esi_amount }}</p>
<p>Net Salary: {{ $payroll->net_salary }}</p>
